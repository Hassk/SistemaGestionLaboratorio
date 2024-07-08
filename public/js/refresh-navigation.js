
    function goBackWithRefresh() {
        const previousPage = document.referrer;
        if (previousPage) {
            const url = new URL(previousPage);
            url.searchParams.set('refresh', 'true');
            window.location.href = url.href;
        } else {
            window.history.back();
        }
    }

