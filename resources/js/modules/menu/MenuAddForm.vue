<template>
    <div class="add_form__wrapper">
        <form v-on:submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="name">Food Item</label>
                <input type="text" class="form-control" placeholder="Enter food item name" v-model="food.item">
                <div class="validation-message" v-text="validation.getMessage('item')"></div>
            </div>
            <div class="form-group">
                <label for="name">Select Category</label>
                <multiselect
                    v-model="food.category"
                    :options="categories"
                ></multiselect>
                <div class="validation-message" v-text="validation.getMessage('category')"></div>
            </div>
            <div class="form-group">
                <label for="name">Price</label>
                <input type="number" class="form-control" placeholder="Enter food item price" v-model="food.price">
                <div class="validation-message" v-text="validation.getMessage('price')"></div>
            </div>
            <div class="form-group">
                <label for="name">Description</label>
                <textarea class="form-control" placeholder="Enter food description" v-model="food.description"></textarea>
                <div class="validation-message" v-text="validation.getMessage('description')"></div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect';
import Validation from './../../utils/Validation'
export default {
    props: ['categories', 'restoId'],
    components: {
        Multiselect
    },
    data() {
        return {
            food: this.getBasicMenuItem(),
            validation: new Validation()
        }
    },
    methods: {
        getBasicMenuItem() {
            return {
                item: '',
                category: '',
                price: '',
                description: ''
            };
        },
        handleSubmit() {
            let food = this.food;
            food.restoId = this.restoId;
            window.axios.post('/api/item', food).then(response => {
                console.log('response', response.data);
                this.$emit('newMenuItemAdded', response.data, food.category);
                this.food = this.getBasicMenuItem();
            }).catch(error => {
                if (error.response.status && error.response.status == 422) {
                this.validation.setMessages(error.response.data.errors);
                }
                console.log('error', error);
            });
        }
    }
}
</script>