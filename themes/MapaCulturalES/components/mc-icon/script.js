app.component('mc-icon', {
    template: $TEMPLATES['mc-icon'],

    setup() { 
        const text = Utils.getTexts('mc-icon');
        return { text };
    },

    props: {
        entity: {
            type: [Entity, Object],
            required: false
        },

        name: {
            type: String,
            required: false
        },

        isLink: {
            type: Boolean,
            default: false
        },
    },

    data() {
        return { };
    },

    computed: {
        icon() {
            const iconset = $MAPAS.config.iconset;
            if (this.entity) {
                const e = this.entity;
                return iconset[`${e.__objectType}-${ e.type?.id || e.type}`] || iconset[e.__objectType] || iconset[e.__objectId];
            } else {
                return iconset[this.name];
            }
        },

        src() {
            const icons = $MAPAS.config.iconsUrl;

            if (icons[this.name])
                return icons[this.name];
            return '';
        },
        
        own() {
            const icons = $MAPAS.config.iconsUrl;

            if (icons[this.name])
                return 'true';
            return 'false';
        },
        
        alt() {
            return `${this.name} Icon`;
        }
    },

    methods: { }
});
