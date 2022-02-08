<script>
import { provide, computed, ref } from "vue";

export default {
    name: "Tabs",
    props: {
        modelValue: {
            type: [String, Number],
        },
    },
    emits: ["update:modelValue"],
    setup(props, { slots, emit }) {
        const active = computed(() => props.modelValue);
        const tabs = ref([]);

        function selectTab(tab) {
            emit("update:modelValue", tab);
        }

        provide("tabsState", {
            active,
            tabs,
        });

        return {
            tabs,
            active,
            selectTab,
        };
    },
};
</script>

<template>
    <ul class="asrc">
        <li
            v-for="(tab, i) of tabs"
            :key="i"
            :class="
                active === i
                    ? 'is-selected'
                    : ''
            "
            class=""
            @click="selectTab(i)"
        >
			<a :href="'#'+tab.props.title.toLowerCase()">{{ tab.props.title }}</a>
        </li>
    </ul>
	<slot />
</template>
