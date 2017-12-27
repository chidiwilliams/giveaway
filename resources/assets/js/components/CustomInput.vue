<template>
    <div class="custom-input-group" :id="dropdownCompId">
        <div class="custom-input" :class="classes" @click.prevent="toggleDrop">
            <span class="item" v-if="value">{{ value }}</span>
            <span class="item" v-else-if="selected_item">{{ selected_item }}</span>
            <span class="item placeholder" v-else>{{ place }}</span>
            
            <i class="glyphicon glyphicon-chevron-down" v-if="!disabled"></i>
        </div>

        <!-- Real input for form submission -->
        <input :name="name" type="hidden" v-model="selected_item" required="required">
        
        <transition name="fade">
            <div class="input-select" :class="classes" v-show="dropped"> <!-- Big body dropdown  -->
                <div v-for="item in items" :key="item.id" @click="selectItem(item)" class="item" v-bind:class="checkIfSelected(item)"> <!-- Dropdown items -->
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
                selected_item: ""
            }
        },
        methods: {
            toggleDrop: function () {
                if (!this.disabled) {
                    this.dropped = !this.dropped
                }
            },
            closeDrop: function () {
                this.dropped = false
            },
            openDrop: function () {
                this.dropped = true
            },
            selectItem: function (item) {
                if (!this.disabled) {
                    this.selected_item = item
                    this.toggleDrop()
                }
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
        watch: {
            selected_item: function (val, old) {
                this.$emit('change', val, old)
            },
            reset: function () {
                this.selected_item = this.items[0]
            }
        },
        computed: {
            dropdownCompId: function () {
                return "custom-input-" + this.dropdownId
            },
            place: function () {
                if (this.placeholder) {
                    return this.placeholder
                } else {
                    return "Select"
                }
            }
        },
        props: ['type', 'classes', 'items', 'placeholder', 'dropdownId', 'reset', 'disabled', 'value', 'name'],
        mounted: function () {
            document.querySelector("#app").addEventListener('click', this.onClickBody)
        },
        beforeDestroy: function () {
            document.querySelector("#app").removeEventListener('click', this.onClickBody)
        }
    }
</script>
