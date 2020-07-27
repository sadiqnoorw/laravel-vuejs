<template>

	<div class="resto-group-wrapper mb-5">
		<div class="row">
			<div class="col-md-4" v-for="resto in localResto" :key="resto.id">
				
				<card-component>
					<template slot="title"> {{resto.name}} </template>	
					<template slot="main"> 
						<i class="fa fa-map-marker" aria-hidden="true"></i>
						{{resto.location}}
						<br>
						<i class="fa fa-table" aria-hidden="true"></i>
						{{resto.tables}}
						<br>
						<a v-bind:href="resto.slug" class="card-link">Menu</a>
						<a v-bind:href="resto.odersSlug" class="card-link">Orders</a>
					 </template>	
				</card-component>
				
			</div>

			<div class="col-md-4" v-if="showAddForm">
				<card-component>
					<template slot="title"> Add new Restaurant </template>	
					<template slot="main">
						<span @click="handleAddNewResto"><i class="fa fa-plus-square fa-2x" aria-hidden="true"></i></span> 
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
	//import axios from "axios";
	export default {
		props: ['restos'],
		components: {
        	RestoAddForm
        },
		created() {
			
		//	console.log("this.restos.length", this.restos.length);
			this.localResto = this.restos;
		},

		computed: {
			showAddForm(){
				return (this.localResto.length < 5) ? true : false ;		
			}
		},

		data() {
			return {
				localResto: []
			}
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
		    	axios.post('/api/resto', restoData).then(response => {
		    		console.log('response', response.data);
		    		this.localResto.unshift(response.data);
		    		this.$modal.hide('add-new-resto');	
		    	});

		    }
		}

	}
</script>