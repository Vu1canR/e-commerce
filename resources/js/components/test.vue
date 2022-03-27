<template>
<div v-bind="inConsole()">
	<select v-model="selected">
        <option>
            something
        </option>
        <option>
            three
        </option>
        <option>
            four
        </option>
        <option value="test">
            test
        </option>
    
    </select>
</div>
</template>
<script>
export default {
	props:{
		products: {}
	},
	data() {
		return {
			selected: 'test'
		};
	},
	methods: {
		inConsole(){
			console.log(this.selected)
		}
	},
};
</script>
