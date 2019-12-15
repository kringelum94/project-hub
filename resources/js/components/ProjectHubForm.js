class ProjectHubForm {
    constructor(data) {
        this.originalData = JSON.parse(JSON.stringify(data));

        Object.assign(this, data);

        this.errors = {};
    }

    data() {
        let data = {};

        for (let attribute in this.originalData) {
            data[attribute] = this[attribute];
        }

        return data;
    }

    post(endpoint) {
        return this.submit(endpoint);
    }

    patch(endpoint) {
        return this.submit(endpoint, 'patch');
    }

    delete(endpoint) {
        return this.submit(endpoint, 'delete');
    }

    submit(endpoint, requestType = 'post') {
        return axios[requestType](endpoint, this.data())
            .catch(this.onFail.bind(this))
            .then(this.onSuccess.bind(this));
    }

    onSuccess(response) {
        this.errors = {};

        return response;
    }

    onFail(error) {
        this.errors = error.response.data.errors;

        throw error;
    }
}

export default ProjectHubForm;