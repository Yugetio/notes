import  { ACTION_CREATE_NAME_FOLDER, ACTION_CREATE_NAME_NOTE, ACTION_CREATE_TEXT_NOTE } from "../constants/index";

const initialState = {
    title: '',
    caption: '',
    text: '',
    parent_id: 0
};

 const windowReducer = (state = initialState, action) => {
    switch (action.type) {
        case ACTION_CREATE_NAME_FOLDER:
            return {...state, caption: action.caption};
        case ACTION_CREATE_NAME_NOTE:
            return {...state, caption: action.title};
        case ACTION_CREATE_TEXT_NOTE:
            return {...state, caption: action.text};
    }
};

export default windowReducer;