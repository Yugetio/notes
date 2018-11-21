import  { ACTION_CREATE_FOLDER, ACTION_CREATE_NOTE, ACTION_CLOSED_WINDOW } from "../constants/index";

export const createNameFolder = (nameFolder) => {
    return {
        type: ACTION_CREATE_FOLDER,
        caption: nameFolder
    }
};

export const createNameNote = (nameNote) => {
    return {
        type: ACTION_CREATE_NOTE,
        caption: nameNote
    }
};

export const createTextNote = (textNote) => {
    return {
        type: ACTION_CLOSED_WINDOW,
        caption: textNote
    }
};

