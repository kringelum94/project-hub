<template>
      <modal name="edit-list-modal" classes="box relative" height="auto" @before-open="beforeOpen">
        <a href="" @click.prevent="$modal.hide('edit-list-modal')">
            <i class="fas fa-times text-grey font-bold text-2xl absolute right-0 top-0 p-4 hover:text-red"></i>
        </a>
        <h2 class="title text-center py-4"> Edit the list </h2>
        <form @submit.prevent="submit">
            <div>
                <div class="mb-4">
                    <input class="input" :class="form.errors.name ? 'is-invalid' : ''" v-model="form.name" v-text="form.name" required placeholder="List name" name="name">
                    <span class="text-red text-sm my-1 block text-center" v-if="form.errors.name" v-text="form.errors.name[0]"></span>
                </div>
            </div>

            <div class="py-4">
                <div class="flex justify-around">
                    <button type="submit" class="button">Save list</button>
                    <button type="button" @click="$modal.hide('edit-list-modal')" class="button danger">Cancel</button>
                </div>
            </div>
        </form>
    </modal>
</template>

<script>
import ProjectHubForm from './ProjectHubForm';

export default {
    data() {
        return {
            form: new ProjectHubForm({
                name: ''
            }),
            path: ''
        };
    },

    methods: {
        beforeOpen (event) {
            this.form.name = event.params.name;
            this.path = event.params.path;
        },
        submit() {
            this.form.patch(this.path)
            .then(response => location = response.data.message);
        }    
    }
}
</script>

<style>

</style>