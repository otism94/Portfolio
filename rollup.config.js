import { getBabelOutputPlugin } from '@rollup/plugin-babel'
import { terser } from 'rollup-plugin-terser'

const config = {
    input: './src/js/app.js',
    plugins: [
        getBabelOutputPlugin({
            presets: ['@babel/preset-env']
        }),
        terser()
    ],
    output: [
        { file: './dist/js/app.min.js', format: 'esm' }
    ]
}

export default config