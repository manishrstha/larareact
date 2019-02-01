import axios from 'axios';
import React,{Component} from 'react';
import {BrowserRouter as Router,Link,Route} from 'react-router-dom';
export function StripTags(html){
	return html.replace(/<\/?[a-z][a-z0-9]*[^<>]*>/ig, "")
}
export function ImportFiles(image){
	function importAll(r) {
		let images = {};
		r.keys().map((item, index) => { 
			images[item.replace('./', '')] = r(item); 
		});

		return images;
	}

	const images = importAll(require.context('../../../public/uploads/', true, /\.(png|jpe?g|svg)$/));
	return images[image];
}
export function SendEmail(e){
		e.preventDefault();
		let arr = {};
		let route = e.target.getAttribute('action');
		let allFields = document.querySelectorAll(".form-control");
		let alert = document.querySelectorAll(".alert-msg")[0];
		let sendButton = e.target.querySelectorAll(".genric-btn")[0];
		let sendButtonText = sendButton.innerHTML;
		sendButton.innerHTML = sendButtonText + ' <i class="fa fa-spinner fa-spin fa-fw"></i>';
		for(let i = 0; i < allFields.length; i++){
			arr[allFields[i].name] = allFields[i].value
		}
		alert.style.color="red";
		axios.post(route,arr).then(response => {
			sendButton.innerHTML = sendButtonText;
			alert.innerHTML = "Thank you for contacting us ! We Will get back to you as soon as possible";
			for(let i = 0; i < allFields.length; i++){
				allFields[i].value="";
			}
		}).catch(errors => {
			sendButton.innerHTML = sendButtonText;
			alert.innerHTML = "Sorry! Mail not send, Try after a while";
		})
}
export function LimitData(data,number){
	return data.slice(0,number);
}
export function SliceCharAndLink(text,start,end,link){
	return (
		<div>
			{StripTags(text).substr(start,end)}
			<Link to={link}>...read more</Link>
		</div>
		)
}
