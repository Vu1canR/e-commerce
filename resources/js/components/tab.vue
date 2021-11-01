<script>
import { computed, inject, watchEffect, getCurrentInstance } from "vue";

export default {
    name: "Tab",
    props: {
        title: String,
    },
    setup(props) {
        const instance = getCurrentInstance();
        const { tabs, active } = inject("tabsState");

        const index = computed(() =>
            tabs.value.findIndex((target) => target.uid === instance.uid)
        );
        const isActive = computed(() => index.value === active.value);

        watchEffect(() => {
            if (index.value === -1) {
                tabs.value.push(instance);
            }
        });

        return {
            isActive,
        };
    },
    computed: {

    },
};
</script>

<template>
    <div>
        <div class="tab-div" v-if="isActive">
            <transition name="fade">
        
                <slot />
            </transition>
        </div>
    </div>
</template>
