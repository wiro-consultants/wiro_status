plugin.tx_wirostatus {
    view {
        templateRootPaths {
            0 = EXT:wiro_status/Resources/Private/Templates/
            1 = {$plugin.tx_wirostatus.view.templateRootPath}
        }

        partialRootPaths {
            0 = EXT:wiro_status/Resources/Private/Partials/
            1 = {$plugin.tx_wirostatus.view.partialRootPath}
        }

        layoutRootPaths {
            0 = EXT:wiro_status/Resources/Private/Layouts/
            1 = {$plugin.tx_wirostatus.view.layoutRootPath}
        }
    }

    settings {
        apiUrl = {$plugin.tx_wirostatus.settings.apiUrl}
        statusLink = {$plugin.tx_wirostatus.settings.statusLink}
    }
}
