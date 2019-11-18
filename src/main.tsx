import React from 'react'
import ReactDOM from 'react-dom'
import { App } from './app/App'
import './main.sass'

const ROOT_ELEMENT_ID = 'plugin-app-root'

export type AsyncCall = (data: { [key: string]: any }) => Promise<{ [key: string]: any }>
export type Config = {
	action: string
	name: string
	id: string
}

const createReq = (action: string) => (data: { [key: string]: any }) =>
	jQuery.post((window as any).ajaxurl, { action, ...data })

function main(el: HTMLElement) {
	const config = JSON.parse(el.dataset.config as string) as Config
	const req = createReq(config.action)
	ReactDOM.render(<App config={config} req={req} />, el)
}

window.addEventListener('load', () => {
	const el = document.getElementById(ROOT_ELEMENT_ID)
	if (el) {
		main(el)
	}
})
