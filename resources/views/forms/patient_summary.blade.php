@extends('layouts.admin_template')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Create New Patient</div>

			<div class="panel-body">

				<div id="app"">


					<form method="POST" action="/projects">

						
						<div class="form-group">

							<label for="name" class="col-2">Patient Name:</label>
							<div class="col-10">
								<input type="text" id="name" name="name" class="form-control" v-model="form.p_name">		
							</div>
							
						</div>

						<div class="form-group">
							<label for="description">Patient NRIC:</label>
							<input type="text" id="description" name="description" class="form-control" v-model="form.p_nric">
						</div>
						<div class="form-group">
							<label for="description">CareHub Team Name:</label>
							<input type="text" id="description" name="description" class="form-control" v-model="form.team_name">
						</div>

						<div class="form-group">
							<label for="description">I went to hospital because of:</label>
							<input type="text" id="description" name="description" class="form-control" v-model="form.reason">
						</div>

						<div class="form-group">
							<label for="description">I should aim to reach the goals:</label>
							<small>goal | by when | how</small>
							<input type="text" id="description" name="description" class="form-control" v-model="form.goal">
						</div>

						<div class="form-group">
							<label for="description">I should take note of:</label>
							<small>Symptoms(Red Flags) | What should I do</small>
							<input type="text" id="description" name="description" class="form-control" v-model="form.note">
						</div>

						<div class="form-group">
							<label for="description">My care team advised me to do the followings: </label>
							<small>Instructions(Care Plan) | What should I do</small>
							<input type="text" id="description" name="description" class="form-control" v-model="form.advise">
						</div>

						<div class="form-group">
							<label for="description">My care team will follow me up for: </label>
							<input type="text" id="description" name="description" class="form-control" v-model="form.follow">
						</div>

						<div class="form-group">
							<label for="description">My upcoming outpatient visits: </label>
							<small>Discipline/Location | Date of Appointment | Remark</small>
							<input type="text" id="description" name="description" class="form-control" v-model="form.visit">
						</div>

						<div class="form-group">
							<label for="description">I should take note of my drug allergy: </label>
							<input type="text" id="description" name="description" class="form-control" v-model="form.allergy">
						</div>

						<div class="form-group">
							<label for="description">Supplementary Notes: </label>
							<input type="text" id="description" name="description" class="form-control" v-model="form.supp">
						</div>

						
						<button class="btn btn-primary" :disabled="form.errors.any()">Create</button>

						
					</form>
				</div>



			</div>
		</div>
	</div>
</div>
@endsection

@section('postscript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.js"></script>
<script src="https://unpkg.com/vue@2.1.6/dist/vue.js"></script>

<script>
	class Errors {
    /**
     * Create a new Errors instance.
     */
     constructor() {
     	this.errors = {};
     }


    /**
     * Determine if an errors exists for the given field.
     *
     * @param {string} field
     */
     has(field) {
     	return this.errors.hasOwnProperty(field);
     }


    /**
     * Determine if we have any errors.
     */
     any() {
     	return Object.keys(this.errors).length > 0;
     }


    /**
     * Retrieve the error message for a field.
     *
     * @param {string} field
     */
     get(field) {
     	if (this.errors[field]) {
     		return this.errors[field][0];
     	}
     }


    /**
     * Record the new errors.
     *
     * @param {object} errors
     */
     record(errors) {
     	this.errors = errors;
     }


    /**
     * Clear one or all error fields.
     *
     * @param {string|null} field
     */
     clear(field) {
     	if (field) {
     		delete this.errors[field];

     		return;
     	}

     	this.errors = {};
     }
 }


 class Form {
    /**
     * Create a new Form instance.
     *
     * @param {object} data
     */
     constructor(data) {
     	this.originalData = data;

     	for (let field in data) {
     		this[field] = data[field];
     	}

     	this.errors = new Errors();
     }


    /**
     * Fetch all relevant data for the form.
     */
     data() {
     	let data = {};

     	for (let property in this.originalData) {
     		data[property] = this[property];
     	}

     	return data;
     }


    /**
     * Reset the form fields.
     */
     reset() {
     	for (let field in this.originalData) {
     		this[field] = '';
     	}

     	this.errors.clear();
     }


    /**
     * Send a POST request to the given URL.
     * .
     * @param {string} url
     */
     post(url) {
     	return this.submit('post', url);
     }


    /**
     * Send a PUT request to the given URL.
     * .
     * @param {string} url
     */
     put(url) {
     	return this.submit('put', url);
     }


    /**
     * Send a PATCH request to the given URL.
     * .
     * @param {string} url
     */
     patch(url) {
     	return this.submit('patch', url);
     }


    /**
     * Send a DELETE request to the given URL.
     * .
     * @param {string} url
     */
     delete(url) {
     	return this.submit('delete', url);
     }


    /**
     * Submit the form.
     *
     * @param {string} requestType
     * @param {string} url
     */
     submit(requestType, url) {
     	return new Promise((resolve, reject) => {
     		axios[requestType](url, this.data())
     		.then(response => {
     			this.onSuccess(response.data);

     			resolve(response.data);
     		})
     		.catch(error => {
     			this.onFail(error.response.data);

     			reject(error.response.data);
     		});
     	});
     }


    /**
     * Handle a successful form submission.
     *
     * @param {object} data
     */
     onSuccess(data) {
        alert(data.message); // temporary

        this.reset();
    }


    /**
     * Handle a failed form submission.
     *
     * @param {object} errors
     */
     onFail(errors) {
     	this.errors.record(errors);
     }
 }


 new Vue({
 	el: '#app',

 	data: {
 		form: new Form({
 			p_name: '',
 			p_nric: '',
 			team_name: '',
 			reason: '',
 			goal: '',
 			note: '',
 			advise: '',
 			follow: '',
 			visit: '',
 			allergy: '',
 			supp: ''
 		})
 	},

 	methods: {
 		onSubmit() {
 			this.form.post('/projects')
 			.then(response => alert('Wahoo!'));
 		}
 	}
 });
</script>
@endsection