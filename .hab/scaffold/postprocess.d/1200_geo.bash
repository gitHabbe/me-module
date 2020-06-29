# Copy the configuration files
rsync -av vendor/githabbe/me-module/config ./

# Copy the views
rsync -av vendor/githabbe/me-module/view/ ./view/MeModule

# Copy markdown content
rsync -av vendor/githabbe/me-module/docs.md ./content/
