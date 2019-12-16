<template>
      <modal name="edit-task-modal" classes="box relative" height="auto" @before-open="beforeOpen">
        <a href="" @click.prevent="$modal.hide('edit-task-modal')">
            <i class="fas fa-times text-grey font-bold text-2xl absolute right-0 top-0 p-4 hover:text-red"></i>
        </a>
        <h2 class="title text-center py-4"> Edit the task </h2>
        <form @submit.prevent="submit">
            <div>
                <div class="mb-4">
                    <input class="input" :class="form.errors.description ? 'is-invalid' : ''" v-model="form.description" v-text="form.description" required placeholder="Task description" name="description">
                    <span class="text-red text-sm my-1 block text-center" v-if="form.errors.description" v-text="form.errors.description[0]"></span>
                </div>
            </div>

            <div class="py-4">
                <div class="flex justify-around">
                    <button type="submit" class="button">Save task</button>
                    <button type="button" @click="$modal.hide('edit-task-modal')" class="button danger">Cancel</button>
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
                description: ''
            }),
            path: ''
        };
    },

    methods: {
        beforeOpen (event) {
            this.form.description = event.params.description;
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