import cn from 'classnames'
import React from 'react'

interface ButtonProps
	extends React.DetailedHTMLProps<
		React.ButtonHTMLAttributes<HTMLButtonElement>,
		HTMLButtonElement
	> {
	primary?: boolean
	secondary?: boolean
	disabled?: boolean
	submit?: boolean
}

export function Button(props: ButtonProps) {
	const { submit, primary, secondary, ...rest } = props
	return (
		<button
			type={submit ? 'submit' : 'button'}
			className={cn('button', {
				'button-primary': primary,
				'button-secondary': secondary,
				'button-disabled': props.disabled,
			})}
			{...rest}
		/>
	)
}
