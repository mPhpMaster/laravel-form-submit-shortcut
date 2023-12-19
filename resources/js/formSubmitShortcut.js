((config) => {
    try {
        config = (window.config || config || {});
    } catch (e) {
        config = {};
    }

    let shortcutKey = config?.formSubmitShortcut?.key || undefined;
    if (shortcutKey) {
        let $shortcutKey = String(shortcutKey)
            .trim()
            .split("+")
            .filter(x => x)
            .map(x => String(x).trim().toLowerCase());

// region: handle save form
        document.addEventListener('keydown', function (e) {
            let keyPressed = $shortcutKey.find(x => x.length === 1 && !['alt', 'ctrl', 'shift', 'meta'].includes(
                String(x).trim().toLowerCase()
            ));
            if (
                e.altKey === $shortcutKey.includes('alt') &&
                e.ctrlKey === $shortcutKey.includes('ctrl') &&
                e.shiftKey === $shortcutKey.includes('shift') &&
                e.metaKey === $shortcutKey.includes('meta') &&
                (
                    !keyPressed ||
                    String(e.key).trim().toLowerCase() === keyPressed
                )
            ) {
                e.preventDefault();
                let btn = (window.document.activeElement?.form || window.document).querySelector('[type="submit"]');
                if (btn) {
                    btn.click();
                }
            }

            return false;
        });
    }
// endregion: handle save form
})(
    (() => {
        try {
            return config;
        } catch (e) {
            return {};
        }
    })()
);