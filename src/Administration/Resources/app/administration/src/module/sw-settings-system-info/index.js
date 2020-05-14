import './page/sw-settings-system-info';

const { Module } = Shopware;

Module.register('sw-settings-system-info', {
    type: 'core',
    name: 'settings-system-info',
    title: 'sw-settings-system-info.general.mainMenuItemGeneral',
    description: 'sw-settings-system-info.general.description',
    version: '1.0.0',
    targetVersion: '1.0.0',
    color: '#9AA8B5',
    icon: 'default-device-server',
    favicon: 'icon-module-settings.png',

    routes: {
        index: {
            component: 'sw-settings-system-info',
            path: 'index',
            meta: {
                parentPath: 'sw.settings.index'
            }
        }
    },

    settingsItem: {
        group: 'system',
        to: 'sw.settings.system-info.index',
        icon: 'default-device-server'
    }
});
