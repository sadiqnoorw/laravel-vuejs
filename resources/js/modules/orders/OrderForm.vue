<template>
	<div class="wrapper">
		<form action="#">
			<div class="form-group">
			    <label for="name">Name</label>
			    <input type="text" 
			    	class="form-control" 
			    	id="name"
			    	v-model="customer.name" 
			    	placeholder="enter customer name">
			</div>

			<div class="form-group">
			    <label for="phone">Phone</label>
			    <input 
			    	type="text" 
			    	class="form-control" 
			    	id="location"
			    	v-model="customer.phone" 
			    	placeholder="enter customer phone">
			</div>

			<div class="form-group">
			    <label for="address">Address</label>
			    <input 
			    	type="text" 
			    	class="form-control" 
			    	id="address"
			    	v-model="customer.address" 
			    	placeholder="enter customer address">
			</div>
		</form>	
	</div>
</template>
<script>
	export default {
		data (){
			
			return {
				customer: {
					name: '',
					phone: '',
					address: ''
				}
			}
		}
	}
</script>