FROM mysql:5.7
WORKDIR /db
COPY . .
RUN yarn install --production
EXPOSE 3306