bundle exec middleman build
aws s3 sync --region=us-west-2 --profile shawn build/ s3://www.coffeaconsulting.com/ --delete
