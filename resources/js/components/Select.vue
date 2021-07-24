<template>
    <Listbox v-model="selected" as="div">
        <ListboxLabel class="text-sm font-medium text-gray-700" v-text="title"></ListboxLabel>
        <div class="mt-1 relative">
            <ListboxButton class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none sm:text-sm">
                    <span class="flex items-center">
                      <span class="ml-3 block truncate">{{ selected }}</span>
                    </span>
                <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                  <SelectorIcon aria-hidden="true" class="h-5 w-5 text-gray-400"/>
                </span>
            </ListboxButton>

            <transition v-if="data" leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
                <ListboxOptions class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-80 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                    <ListboxOption v-for="d in data" :key="d.name" v-slot="{ active, selected }" :value="d.name" as="template" @click="onSelect">
                        <li :class="[active ? 'text-white bg-blue' : 'text-gray-900', 'cursor-default select-none relative py-2 pl-3 pr-9']">
                            <div class="flex items-center">
                                <span :class="[selected ? 'font-semibold' : 'font-normal', 'ml-3 block truncate']">
                                  {{ d.name }}
                                </span>
                            </div>

                            <span v-if="selected" :class="[active ? 'text-white' : 'text-black', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                                <CheckIcon aria-hidden="true" class="h-5 w-5"/>
                            </span>
                        </li>
                    </ListboxOption>
                </ListboxOptions>
            </transition>
            <transition v-if="numbers" leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
                <ListboxOptions class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-80 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm" @click="onSelect">
                    <ListboxOption v-for="number in numbers" :key="number" v-slot="{ active, selected }" :value="number" as="template">
                        <li :class="[active ? 'text-white bg-blue' : 'text-gray-900', 'cursor-default select-none relative py-2 pl-3 pr-9']">
                            <div class="flex items-center">
                                <span :class="[selected ? 'font-semibold' : 'font-normal', 'ml-3 block truncate']">
                                  {{ number }}
                                </span>
                            </div>

                            <span v-if="selected" :class="[active ? 'text-white' : 'text-black', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                                <CheckIcon aria-hidden="true" class="h-5 w-5"/>
                            </span>
                        </li>
                    </ListboxOption>
                </ListboxOptions>
            </transition>
        </div>
    </Listbox>
</template>

<script>
import {Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions} from '@headlessui/vue'
import {CheckIcon, SelectorIcon} from '@heroicons/vue/solid'

export default {
    components: {
        Listbox,
        ListboxButton,
        ListboxLabel,
        ListboxOption,
        ListboxOptions,
        CheckIcon,
        SelectorIcon,
    },
    props : {
        title: String,
        data: Array,
        numbers: Number,
        currentData: [String, Number],
    },
    data() {
        return {
            selected: null
        }
    },
    created() {
        this.setActual()
    },
    methods: {
        setActual() {
            this.selected = this.currentData
        },
        onSelect() {
            this.$emit('selected', this.selected)
        }
    }
}
</script>

<style scoped>

</style>
