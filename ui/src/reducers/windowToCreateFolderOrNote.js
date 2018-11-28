import  { ACTION_RECEIVE_NAME_FOLDER, ACTION_OPEN_WINDOW_TO_CREATE, ACTION_CLOSED_WINDOW } from "../constants/index";

const initialState = {
    windowForCreating: 0,
    dataFolder: {
        title: '',
        parent_id: ''
    },
    httpMethod: 'POST',
    url: 'api/auth/folder/{id}'
};


 const createFolderNoteReducer = (state = initialState, action) => {
    switch (action.type) {
        case ACTION_RECEIVE_NAME_FOLDER:
            return {...state, state.dataFolder.title: action.payload};
        case ACTION_OPEN_WINDOW_TO_CREATE:
            return {...state, windowForCreating: action.payload};
        case ACTION_CLOSED_WINDOW:
            return {...state, windowForCreating: action.payload};
        default:
            return state
    }
};

export default createFolderNoteReducer;