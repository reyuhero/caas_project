import React from 'react';
interface Props {
    label: string;
    id: string;
    type: string;
    placeholder?: string;
    onChange?: () => void;
}
const Input = ({label, id, type, placeholder='', onChange: any}: Props) => {
    return (
        <div className="form-group">
            <label htmlFor={id} className="form-label">{label}</label>
            <input
            type={type}
            className="form-control"
            id={id}
            placeholder={placeholder}/>
        </div>
    );
}
export default Input;
