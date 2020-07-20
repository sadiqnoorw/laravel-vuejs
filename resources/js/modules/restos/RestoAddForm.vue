<template>
	<div class="resto_add_form_wrapper">
		<h3>Add a new Restaurent</h3>
		<div class="form-group">
		    <label for="name">Name</label>
		    <input type="text" 
		    	class="form-control" 
		    	id="name"
		    	v-model="resto.name" 
		    	placeholder="enter restaurent name">
		</div>

		<div class="form-group">
		    <label for="address">Address</label>
		    <input 
		    	type="text" 
		    	class="form-control" 
		    	id="address"
		    	v-model="resto.address" 
		    	placeholder="enter restaurent address">
		</div>

		<div class="form-group">
		    <label for="number-of-table">Number of table</label>
		    <input 
		    	type="text" 
		    	class="form-control" 
		    	id="number-of-table"
		    	v-model="resto.tables" 
		    	placeholder="enter restaurent name">
		</div>

		<button class="btn btn-primary" @click="handleAddButton"> Add </button>
		<button class="btn btn-warning" @click="handleCancelButton"> Cancel </button>

	</div>
</template>

<script>
	export default {
		data() {
			return {
				resto: this.basicResto(),
			}
		},

		methods: {
			basicResto() {
				return { name: '', address: '', tables: 0}
			},

			handleAddButton() {
				this.$emit('addRestoEvent', this.resto);
			},

			handleCancelButton() {
				this.basicResto();
				this.$emit('modelCancel');
			}

		}

	}
</script>