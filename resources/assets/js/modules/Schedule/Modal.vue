<template>
    <page-modal :config="modalState">
        <tabs slot="modal-body"></tabs>
    </page-modal>
</template>
<script>
    import PageModal from '../../../components/page/Modal.vue'
    import Tabs from './Tabs.vue'
    import {store} from './Store/store'

    export default{
        computed: {
            modalState() {
                return store.state.crud.modal
            }
        },
        components: {
            PageModal,
            Tabs
        }
    }
</script>