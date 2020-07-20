<template>

	<div class="resto-group-wrapper mb-5">
		<div class="row">
			<div class="col-md-4" v-for="resto in restos" :key="resto.id">
				
				<card-component>
					<template slot="title"> {{resto.name}} </template>	
					<template slot="main"> {{resto.location}} </template>	
				</card-component>
				
			</div>

			<div class="col-md-4" v-if="showAddForm">
				<card-component>
					<template slot="title"> Add new Restaurant </template>	
					<template slot="main">
						<span @click="handleAddNewResto">+</span> 
					</template>		
				</card-component>

				<modal name="add-new-resto" 
					:focusTrap='true' 
					:clickToClose='false' 
					@before-open="beforeOpen"
         			@before-close="beforeClose"
					draggable=".draggable-window"
					> 
					<!--  <button @click="$modal.hide('add-new-resto')">
				       ❌
				     </button>
					<div class="draggable-window">Draggable</div>
					<div @click="modalClose">modalClose</div> -->

					<resto-add-form
						@modelCancel="handleCancelResto"
						@addRestoEvent="handleSaveResto">
							
					</resto-add-form>
					
				</modal>

			</div>
	
		</div>	
	</div>

</template>

<script>
	
	import RestoAddForm from "./RestoAddForm.vue";

	export default {
		props: ['restos'],
		components: {
        	RestoAddForm
        },
		created() {
			console.log("this.restos.length", this.restos.length);
		},

		computed: {
			showAddForm(){
				return (this.restos.length < 5) ? true : false ;		
			}
		},

		data() {
			return {}
		},

		methods: {
			handleAddNewResto(){
				 this.$modal.show('add-new-resto');
			},
			modalClose(){
				this.$modal.hide('add-new-resto');
			},

			//beforemodel open and beforemodel close
			beforeOpen (event) {
		      //console.log('Opening...')
		    },

		    beforeClose (event) {
		      //console.log('Closing...')
		    },

		    handleCancelResto() {
		    	this.$modal.hide('add-new-resto');	
		    },

		    handleSaveResto(restoData) {
		    	console.log(restoData);
		    }
		}

	}
</script>