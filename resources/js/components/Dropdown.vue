<template>
    <div class="dropdown relative">
        <div @click.prevent="isOpen = !isOpen" aria-haspopup="true" :aria-expanded="isOpen">
            <slot name="trigger"></slot>
        </div>
        <div v-show="isOpen" class="dropdown-menu">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return { isOpen: false}
    },

    watch: {
        isOpen(isOpen) {
            document.addEventListener('click', this.closeIfClickedOutside);
        }
    },

    methods: {
        closeIfClickedOutside(event) {
            if(!event.target.closest('.dropdown')) {
                this.isOpen = false;
                document.removeEventListener('click', this.closeIfClickedOutside);
            }
        }
    }
}
</script>