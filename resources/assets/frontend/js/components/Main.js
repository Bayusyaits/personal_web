import React, { Component } from 'react';
import logo from '../../images/logo/bayusyaits.svg';
import ReactDOM from 'react-dom';
 
/* An example React component */
class Main extends Component {
    constructor() {
	    super()

	    // data provinsi disimpan di state.provinces
	    this.state = {
	      categories: []
	    }
	  }

	componentDidMount() {
	    // ajax call
	    fetch('api/create')
	    .then(response => response.json())
	    .then((json) => {
	      this.setState({
	        categories: json.data
	      })
	    })
	  }

    render() {
        return (
            <div className="App">
		        <div className="App-header">
		          <img src={logo} className="App-logo" alt="logo" />
		          <h2>Welcome to React</h2>
		        </div>
		      </div>
        );
    }
}
 
export default Main;
 
/* The if statement is required so as to Render the component on pages that have a div with an ID of "root";  
*/
 
if (document.getElementById('root')) {
    ReactDOM.render(<Main />, document.getElementById('root'));
}