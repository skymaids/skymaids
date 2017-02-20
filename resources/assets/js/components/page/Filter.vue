<template>
    <div class="panel">
        <div class="panel-body">
            <table :id="config.id" class="table table-hover dataTable table-striped w-full">
                <thead>
                    <tr>
                        <th v-for="column in config.columns">{{ column.name }}</th>
                    </tr>
                </thead>
                <tfoot v-show="config.footer.columns">
                    <tr>
                        <th v-for="column in config.columns">{{ column.name }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</template>

<script>
    import {Loader} from '../../services/resources'

    export default {
        props: {
            config: {
                type: Object,
                default: function () {
                    return {}
                }
            }
        },
        data(){
            return{
                table: {}
            }
        },
        computed: {
            url(){
                return (this.config.url) ? `${this.config.url}` : `/${this.config.module}/${this.config.id}/getData`;
            },
            form(){
                return (this.config.form) ? `${this.config.form}` : `form-module-search`;
            }
        },
        ready() {
            let _id  = this.config.id,
                _url = this.url,
                _form = this.form,
                _pageLength = this.config.pageLength,
                _order = this.config.order,
                API,
                oTable,
                scope = this;

            $(document).ready(function() {
                oTable = $(`#${_id}`).dataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    iDisplayLength: _pageLength,
                    language: {
                        url: "/storage/datatables/dataTables-pt-BR.txt"
                    },
                    ajax: {
                        url: _url,
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': Laravel.csrfToken
                        },
                        data: $(`#${_form}`).serializeArray()
                    },
                    initComplete: function(){
                        var api = this.api();
                        API = api;

                        $(`#${_id}_filter input`)
                            .off('.DT')
                            .on('keyup.DT', function (e) {
                                if (e.keyCode == 13) {
                                    api.search(this.value).draw();
                                } else if(e.keyCode == 8 && this.value == '' && $(`#${_id}_info`).html().indexOf('Filtrado') > -1){
                                    api.search(this.value).draw();
                                }
                            });
                        scope.addElementExport(_id);
                        scope.addElementClearSearch(_id);
                        Loader.out();
                    },
                    columnDefs: scope.mountColumns(),
                    order: [[ _order.target, `'${_order.direction}'` ]],
                });

                $.fn.dataTableExt.actions = function (method,obj = {}) {
                    obj.API = API;
                    eval('scope.'+method)(obj);
                };

                $.fn.dataTableExt.tooltip = function (element) {
                    $(element).tooltip('show');
                };
            });
            this.table = oTable;
        },
        methods: {
            addElementExport: function(_id) {
                let element = $(`#${_id}_length`).append(`<button type="button" class="btn btn-icon btn-primary btn waves-effect" id="exportSearch" style="left: 10px; padding: 0.64rem !important;" onmouseover="$.fn.dataTableExt.tooltip(this)" v-on:click="excel" data-toggle="tooltip" data-placement="right" data-original-title="Exportar tabela para Excel" data-trigger="hover"> Excel</button>`);
                this.$compile(element[0]);
            },
            addElementClearSearch: function(_id) {
                let element = $(`#${_id}_filter`).append(`<button type="button" class="btn btn-icon btn-primary btn waves-effect" id="cleanSearch" style="left: -5px;padding: 0.64rem !important;" onmouseover="$.fn.dataTableExt.tooltip(this);" onclick="$.fn.dataTableExt.actions('clearSearch',{id: '${_id}'});" data-toggle="tooltip" data-original-title="Limpar Busca" data-trigger="hover"><i class="icon md-close-circle" aria-hidden="true"></i></button>`);
                this.$compile(element[0]);
            },
            addActions: function(id, type, row) {
                let htmlActions = '';
                $.each(this.config.actions, function(index, value) {
                    htmlActions = `${htmlActions} <a href="#" id="actions" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row waves-effect" name="${value.name}" onmouseover="$.fn.dataTableExt.tooltip(this);" onclick="$.fn.dataTableExt.actions('${value.name}',{id: '${row.id}'})" data-toggle="tooltip" data-original-title="Editar" data-trigger="hover"><i class="${value.icon}" aria-hidden="true"></i></a>`
                });
                return htmlActions;
            },
            excel: function(obj) {
                $('#exportSearch').prop('disabled', true);
                let csv = '';
                let i = 0;
                let separator = ',';
                for (i = 0; i < this.getTableLength(); i++){
                    if(i == 0){
                        csv += this.getExcelColumns(separator) + "%0A";
                    }
                    csv += this.getExcelValues(i,separator) + '%0A';
                }
                this.downloadExcel(csv);
                $('#exportSearch').prop('disabled', false);
            },
            getRandomizer: function(bottom = 1, top = 9999999) {
                return Math.floor( Math.random() * ( 1 + top - bottom ) ) + bottom;
            },
            getTableLength: function(){
                return this.table.api().data().length;
            },
            getExcelName: function(){
                return 'IMATEC-' + this.getRandomizer() + '.csv';
            },
            getExcelColumns: function(separator){
                let line = '';
                this.config.columns.forEach(function(element) {
                    if(!element.action){
                        line += "\"" + element.name + "\"" + separator;
                    }
                });
                return line.slice(0, -1);
            },
            getExcelValues: function(i,separator){
                let line = '';
                let objTable = this.table.api().data();
                this.config.columns.forEach(function(element) {
                    if(!element.action){
                        line += "\"" + objTable[i][element.data] + "\"" + separator;
                    }
                });
                return line.slice(0, -1);
            },
            downloadExcel: function(csv){
                var a         = document.createElement('a');
                a.href        = 'data:attachment/csv,' + csv;
                a.target      = '_blank';
                a.download    = this.getExcelName();

                document.body.appendChild(a);
                a.click();
            },
            edit: function(obj){
                this.$dispatch('modal',`modal-module`,`module-crud`,obj.id)
            },
            clearSearch: function(obj) {
                obj.API.search('').draw();
                $(`#${obj.id}_filter input`).val('').focus();
            },
            reload: function(obj){
                this.table.api().draw(false);
            },
            mountColumns: function() {
                let scope = this;
                let obj = {};
                let objColumns = [];
                let count = 0;
                $.each(this.config.columns, function(index, value) {
                    obj = {};
                    obj.data = value.data;

                    if(value.className){
                        obj.className = value.className;
                    }
                    if(value.action){
                        obj.render = function (id, type, row) {
                            return scope.addActions(id, type, row)
                        };
                    }
                    if(value.width){
                        obj.width = value.width;
                    }

                    obj.sortable = (value.sortable === false) ? false : true;
                    obj.searchable = (value.searchable === false) ? false : true;
                    obj.targets = count;
                    objColumns.push(
                        obj
                    );
                    count++;
                });
                return objColumns;

            }
        },
        events: {
            'reload': function () {
                this.reload();
            }
        }
    }
</script>