<template>
    <div class="custom-input-group" :id="dropdownCompId">
        <div class="custom-input" :class="classes" v-on:click.prevent="toggleDrop">
            <span class="item" v-if="!selected_item">{{ placeholder }}</span>
            <span class="item" v-else>{{ selected_item }}</span> 
            <i class="glyphicon glyphicon-chevron-down"></i>
        </div>

        <!-- Real input for form submission -->
        <input :name="name" type="hidden" v-model="selected_item" required="required">
        
        <transition name="fade">
            <div class="input-select" :class="classes" v-show="dropped"> <!-- Big body dropdown  -->
                <div v-for="item in items" :key="item.id" v-on:click="selectItem(item)" v-bind:class="checkIfSelected(item)"> <!-- Dropdown items -->
                    {{ item }}
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                dropped: false,
                selected_item: this.items[0]
            }
        },
        methods: {
            toggleDrop: function () {
                this.dropped = !this.dropped
            },
            closeDrop: function () {
                this.dropped = false
            },
            openDrop: function () {
                this.dropped = true
            },
            selectItem: function (item) { 
                this.selected_item = item
                this.toggleDrop()
            },
            checkIfSelected: function (item) {
                return (item == this.selected_item) ? 'selected' : ''
            },
            onClickBody: function (event) {
                var dropdown = document.querySelector('#' + this.dropdownCompId)

                if (!(event.target === dropdown || dropdown.contains(event.target))) {
                    this.closeDrop()
                }
            }
        },
        computed: {
            dropdownCompId: function () {
                return "custom-input-" + this.dropdownId
            }
        },
        props: ['type', 'name', 'classes', 'items', 'placeholder', 'dropdownId'],
        mounted: function () {
            document.querySelector("#app").addEventListener('click', this.onClickBody)
        },
        beforeDestroy: function () {
            document.querySelector("#app").removeEventListener('click', this.onClickBody)
        }
    }
</script>
