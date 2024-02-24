/**
 * @category  Collab
 * @package   Collab\QuickLink
 * @author    Marcin Jędrzejewski <m.jedrzejewski@collab.pl>
 * @copyright 2024 Collab
 * @license   MIT
 */

define([], function () {
    'use strict';

    const defaultOptions = {
        prerender: false,
        delay: 0,
        el: document.body,
        limit: Infinity,
        threshold: 0,
        throttle: Infinity,
        timeout: 2000,
        priority: false,
        origins: [location.hostname],
        ignores: []
    };

    const safeEval = selector => selector.replace(/\[([^\[\]]*)\]/g, '.$1.').split('.').filter(Boolean)
        .reduce((prev, cur) => prev && prev[cur], window);

    const getElement = selector => {
        const el = safeEval(selector) || document.querySelector(selector);
        if (el instanceof Element) return el;
        console.warn('Failed to convert options.el', selector, ', so using default HTMLElement document.body');
        return defaultOptions.el;
    };

    const getOrigins = origins => {
        if (!Array.isArray(origins)) {
            console.warn('Failed to convert options.origins', origins, ', so using default origins [location.hostname]');
            return defaultOptions.origins;
        }
        return origins.map(origin => safeEval(origin) || origin);
    };

    const getIgnores = ignores => {
        if (!Array.isArray(ignores)) {
            console.warn('Failed to convert options.ignores', ignores, ', so using default ignores []');
            return defaultOptions.ignores;
        }
        const ignoreFn = uri => ignores.some(ignore => uri.includes(ignore));
        const extraFn = (uri, el) => el.hasAttribute('noprefetch');
        return [ignoreFn, extraFn];
    };

    const getValue = value => {
        if (typeof value !== 'string') return value;
        const number = parseFloat(value);
        return isNaN(number) ? safeEval(value) : number;
    };

    const optionsResolver = jsonOption => {
        const resolvers = {
            el: getElement,
            origins: getOrigins,
            ignores: getIgnores,
            default: getValue
        };
        return Object.fromEntries(Object.entries(jsonOption).map(([key, value]) => [key, (resolvers[key]
            || resolvers.default)(value)]));
    };

    return optionsResolver;
});
