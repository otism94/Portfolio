import { babel } from '@rollup/plugin-babel'
import { terser } from 'rollup-plugin-terser'

export default {
    input: './src/js/main.js',
    output: {
        file: './dist/js/main.min.js',
        format: 'iife',
        plugins: [
            babel({
                babelHelpers: 'bundled',
                exclude: 'node_modules/**',
            }),
            terser(),
        ],
    }
}