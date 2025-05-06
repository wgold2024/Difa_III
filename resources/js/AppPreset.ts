import { definePreset } from "@primeuix/themes";
import Aura from '@primeuix/themes/aura';

export const AppPreset = definePreset(Aura, {
    semantic: {
        primary: {
            50: 'var(--primary-50)',
            100: 'var(--primary-100)',
            200: 'var(--primary-200)',
            300: 'var(--primary-300)',
            400: 'var(--primary-400)',
            500: 'var(--primary-500)',
            600: 'var(--primary-600)',
            700: 'var(--primary-700)',
            800: 'var(--primary-800)',
            900: 'var(--primary-900)',
            950: 'var(--primary-950)'
        },
        formField: {
            paddingX: "1rem",
            paddingY: "1rem"
        },
        myButton: {
            paddingX: "2rem",
            paddingY: "1rem"
        },
        colorScheme: {
            light: {
                formField: {
                    hoverBorderColor: "{primary.color}"
                }
            },
            dark: {
                formField: {
                    hoverBorderColor: "{primary.color}"
                },
                surface: {
                    50: '{blue.50}',
                    100: '{blue.100}',
                    200: '{blue.200}',
                    300: '{blue.300}',
                    400: '{blue.400}',
                    500: '{blue.500}',
                    600: '{blue.600}',
                    700: '{blue.700}',
                    800: '{blue.800}',
                    900: '{blue.900}',
                    950: '{blue.950}'
                }
            },
        },
        components: {
            button: {
                paddingX: "{my.button.padding.x}",
                paddingY: "{my.button.padding.y}",
            }
        }
    }
})
