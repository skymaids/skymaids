<template>
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-30" v-for="relative in config.relatives">{{ relative.name }}</li>
            <li class="breadcrumb-item active">{{ config.name }}</li>
        </ol>
        <slot name="actions"></slot>
    </div>
</template>

<script>
    export default {
        props:{
            config:{
            type: Object,
                default(){
                    return {

                    }
                }
            }
        }
    }
</script>


