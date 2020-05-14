import template from './sw-settings-system-info.html.twig';

const { Component, Mixin } = Shopware;

Component.register('sw-settings-system-info', {
    template,

    mixins: [
        Mixin.getByName('notification')
    ],
    data() {
        return {
            isLoading: false
        };
    },
    methods: {

    }
});
