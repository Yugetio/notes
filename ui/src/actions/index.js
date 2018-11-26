import  { ACTION_RECEIVE_NAME_FOLDER, ACTION_CREATE_NOTE, ACTION_CLOSED_WINDOW } from "../constants/index";

export const receiveNameFolder = (title) => {
    return {
        type: ACTION_RECEIVE_NAME_FOLDER,
        payload: title
    }
};

export const createNameNote = (nameNote) => {
    return {
        type: ACTION_CREATE_NOTE,
        payload: nameNote
    }
};

export const createTextNote = (textNote) => {
    return {
        type: ACTION_CLOSED_WINDOW,
        payload: textNote
    }
};

