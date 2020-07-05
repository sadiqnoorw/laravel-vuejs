<template>

	<div class="add_form_wrapper">
		<form v-on:submit.prevent="handleSubmit">

			<div class="from-group">
				<label for="name"> Food item </label>
				<input class="form-control" type="text" placeholder="Enter food item name" v-model="food.item">
			</div>

			<div class="from-group">
				<label for="">Select Category</label>
				<Multiselect 
                    :options="categories"
                    v-model='food.category'
                    >
                </multiselect>
			</div>

			<div class="from-group">
				<label for="price"> Food price </label>
				<input class="form-control" type="number" placeholder="Enter food item price" v-model="food.price">
			</div>

			<div class="from-group">
				<button class="btn btn-primary">Save</button>
			</div>

		</form>
	</div>

</template>

<script>
import Multiselect from 'vue-multiselect';

	export default {
		props: ["categories"],
		components: {
			Multiselect			
		},

		data () {
			return {
				food: {
					item: '',
					category: '',
					price: 100
				}
			}
		},
		methods: {
			handleSubmit() {
//				event.preventDefault();
				console.log('form data', this.food);
			}
		}
	}
</script>