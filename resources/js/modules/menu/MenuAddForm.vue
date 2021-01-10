<template>
    <div class="add_form__wrapper">
        <form v-on:submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="name">Food Item</label>
                <input type="text" class="form-control" placeholder="Enter food item name" v-model="food.item">
            </div>
            <div class="form-group">
                <label for="name">Select Category</label>
                <multiselect
                    v-model="food.category"
                    :options="categories"
                ></multiselect>
            </div>
            <div class="form-group">
                <label for="name">Price</label>
                <input type="number" class="form-control" placeholder="Enter food item price" v-model="food.price">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect';
export default {
    props: ['categories'],
    components: {
        Multiselect
    },
    data() {
        return {
            food: {
                item: '',
                category: ''
            }
        }
    },
    methods: {
        handleSubmit() {

        }
    }
}
</script>