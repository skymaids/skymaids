<template>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-wrap">
                            <h4 class="form-title">{{ config.title }}</h4>
                            <slot name="content"></slot>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="filter-render"></div>
    </div>
</template>

<script>
    export default {
        props:{
            config:{
            type: Object,
                default(){
                    return {
                        title: ''
                    }
                }
            }
        }
    }
</script>


