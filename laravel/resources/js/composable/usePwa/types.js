// Types taken from https://stackoverflow.com/a/67171375/3861550

/**
 * @typedef {Object} UserChoice
 * @property {"accepted" | "dismissed"} outcome
 * @property {string} platform
 */

/**
 * @typedef {Event} BeforeInstallPromptEvent
 * @property {string[]} platforms
 * @property {Promise<UserChoice>} userChoice
 * @property {function(): Promise<void>} prompt
 */

// Add a comment for global declaration
// You can't directly declare global interfaces in JavaScript, but you can describe it in comments

/**
 * @type {BeforeInstallPromptEvent}
 */
let beforeInstallPromptEvent;

// In JavaScript, you don't need to export types, but you can use JSDoc for better editor support.
