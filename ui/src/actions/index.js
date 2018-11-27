import  { ACTION_RECEIVE_NAME_FOLDER, ACTION_OPEN_WINDOW_TO_CREATE, ACTION_CLOSED_WINDOW } from "../constants/index";

export const receiveNameFolder = (title) => {
    return {
        type: ACTION_RECEIVE_NAME_FOLDER,
        payload: title
    }
};

export const closeWindow = (num) => {
    return {
        type: ACTION_CLOSED_WINDOW,
        payload: num
    }
};

export const openWindowToCreate = (num) => {
    return {
        type: ACTION_OPEN_WINDOW_TO_CREATE,
        payload: num
    }
};

