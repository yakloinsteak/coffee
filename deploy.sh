bundle exec middleman build
aws configure
aws s3 sync build/ s3://shawnsbucketname/
