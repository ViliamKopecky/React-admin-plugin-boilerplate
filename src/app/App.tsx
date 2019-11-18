import React from 'react'
import { AsyncCall, Config } from '../main'
import { Button } from '../ui/Button'
import './App.sass'

export function App(props: { config: Config; req: AsyncCall }) {
	const { req, config } = props

	const [ajaxData, setAjaxData] = React.useState<null | object>(null)

	const exampleRequest = React.useCallback(() => {
		req({ now: new Date().toTimeString() }).then(setAjaxData)
	}, [req, setAjaxData])

	return (
		<div className="PluginApp-App">
			<h1>{config.name}</h1>
			<h2>Config</h2>
			<pre>{JSON.stringify(config, null, 2)}</pre>
			<h2>AJAX test</h2>
			<Button onClick={exampleRequest}>Do AJAX</Button>
			{ajaxData && <pre>{JSON.stringify(ajaxData, null, 2)}</pre>}
		</div>
	)
}
