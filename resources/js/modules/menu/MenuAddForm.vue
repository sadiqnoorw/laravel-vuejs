<template>

	<div class="add_form_wrapper">
		<form v-on:submit.prevent="handleSubmit">

			<div class="from-group">
				<label for="name"> Food item </label>
				<input class="form-control" type="text" placeholder="Enter food item name" v-model="food.item">
				<div class="validation-message" v-text="validation.getMessage('item')"></div>
			</div>

			<div class="from-group">
				<label for="">Select Category</label>
				<Multiselect 
                    :options="categories"
                    v-model='food.category'
                    >
                </multiselect>
                <div class="validation-message" v-text="validation.getMessage('category')"></div>
			</div>

			<div class="from-group">
				<label for="price"> Food price </label>
				<input class="form-control" type="number" placeholder="Enter food item price" v-model="food.price">
				<div class="validation-message" v-text="validation.getMessage('price')"></div>
			</div>
			<div class="from-group">
				<label for="price"> Food Description </label>
				<textarea class="form-control" v-model="food.description">Enter food item Description</textarea>
				<div class="validation-message" v-text="validation.getMessage('description')"></div>
			</div>

			<div class="from-group">
				<button class="btn btn-primary">Save</button>
			</div>

		</form>
	</div>

</template>

<script>
import Multiselect from 'vue-multiselect';
import Validation from '../../utils/Validation.js'
	export default {
		props: ["categories", "restoId"],
		components: {
			Multiselect			
		},

		data () {
			return {
				food: this.emptyFoodItem(),
				validation: new Validation() 
			}
		},
		methods: {
			emptyFoodItem(){
				return {
					item: '',
					category: '',
					description: '',
					price: 100
				};
			},

			handleSubmit() {
//				event.preventDefault();
				let postData = this.food;
				postData.restoId = this.restoId;
				console.log('form data', postData);
				window.axios.post('api/item/save', postData).then(response => {
					this.food = this.emptyFoodItem();
					this.$emit('newMenuItemAdded', response.data, postData.category);
				}).catch(error => {
					if (error.response.status == 422) {
						this.validation.setMessage(error.response.data.errors);									
					console.log('error',error.response.data.errors)
					}
				});

			}
		}
	}
</script>