import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import registerServiceWorker from './registerServiceWorker';
import {Provider} from 'react-redux';
import {createStore} from 'redux';
import allReducers from "./reducers";

const store = createStore(allReducers, window._REDUX_DEVTOOLS_EXTENSION_ && window.__REDUX_DEVTOOLS_EXTENSION__());

// store.subscribe( () => {
//     console.log('subscribe', store.getState());
// });


ReactDOM.render(
    <Provider store = {store}>
        <App />
    </Provider>,

    document.getElementById('root'));
registerServiceWorker();
