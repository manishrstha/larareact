import {createStore} from 'redux';
function get_data(state={},action){
	switch(action.type){
		case 'all':
		return (
			axios.get('api/all-data/').then( response => {
				return response.data

			}).catch(errors => {
				console.log("Sorry data couldnt be fetched");
			})
		)
		default:
			return state;
	}
}