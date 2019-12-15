module.exports = {
    theme: {
        extend: {
            boxShadow: {
                default: "0px 6px 12px 0px rgba(0, 0, 0, 0.2)"
            },
            colors: {
                "button-hover": "var(--text-button-hover-color)",
                green: "#27ae60",
                "green-light": "#2ecc71",
                grey: "#7f8c8d",
                "grey-light": "#ecf0f1",
                red: "#c0392b"
            },
            backgroundColor: {
                page: 'var(--page-background-color)',
                box: 'var(--box-background-color)',
                button: 'var(--button-background-color)',
                header: 'var(--header-background-color)'
            },
            fontSize: {
                "7xl": "5rem"
            }
        }
    },
    variants: {},
    plugins: []
};
