import React from 'react'

export function Button(
	props: React.DetailedHTMLProps<React.ButtonHTMLAttributes<HTMLButtonElement>, HTMLButtonElement>
) {
	return <button type="button" className="button button-primary" {...props} />
}
