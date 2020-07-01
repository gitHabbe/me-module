# Copy the configuration files
rsync -av vendor/githabbe/me-module/config ./

# Copy the views
rsync -av vendor/githabbe/me-module/view/MeModule ./view/

# Copy markdown content
rsync -av vendor/githabbe/me-module/docs.md ./content/
